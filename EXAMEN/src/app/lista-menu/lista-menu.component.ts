import { RouterModule } from '@angular/router';
import { Pedido } from './../interface/pedido';
import { Menu } from './../interface/menu';
import { MenuService } from './../services/menu.service';
import { Component, ElementRef,OnDestroy, OnInit, ViewChild } from '@angular/core';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs=pdfFonts.pdfMake.vfs;


import{DataTablesModule} from 'angular-datatables';
import { faCoffee } from '@fortawesome/free-solid-svg-icons';
import { FlashMessagesService } from 'angular2-flash-messages';
import { NgForm } from '@angular/forms';
import { Subject } from 'rxjs';
@Component({
  selector: 'app-lista-menu',
  templateUrl: './lista-menu.component.html',
  styleUrls: ['./lista-menu.component.css']
})
export class ListaMenuComponent implements OnDestroy, OnInit {
  dtTrigger: Subject<any> = new Subject<any>();
  dtOptions: DataTables.Settings = {};
   menu : Menu[] ;
   seleccionMenu:Menu={
     id:0,
     nombre: '',
     precio: 0
   }
   
   pedido:Pedido={
    idMenu:0,
    nombreCliente:'',
    apellidosCliente:'',
    correo:'',
    telefono:'',
    direccion:'',
    cantidad:0,
    descripcion:'',
    costo:0
   }
   @ViewChild("pedidoForm") clienteForm:NgForm;
   @ViewChild("botonCerrar") botonCerrar: ElementRef;
   precio:number=0;
  //  cantidad:number=0;
   costo:number=0;
   nombre:any;
  
  constructor(private MenuService:MenuService, private flashMessages:FlashMessagesService,private route:RouterModule) { 
    // this.ObtenerMenu();
  }
  ngOnInit(): void {
    this.dtOptions={
      pagingType: 'full_numbers',
      pageLength: 6,
      language:{
        url:'//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
      }
    }; this.MenuService.get().subscribe((data:Menu[])=>{
      this.menu=data;   
      this.dtTrigger.next();
      },(error)=>{
        alert('Ocurrio un error');
      });
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }

  pdf(){
    const pdfDefinition: any = {
      content:[
        {
          text:'Hola Mundo'
        }
        
      ]
    }
    const pdf = pdfMake.pdf(pdfDefinition);
    pdf.open();
  }
  
 pasar(item:Menu){
    this.pedido.idMenu=item.id;
    this.nombre=item.nombre;
    this.precio=item.precio;
 }
  // ObtenerMenu(){
  //   this.MenuService.get().subscribe((data:Menu[])=>{
  //     this.menu=data;       
  //   },(error)=>{
  //     alert('Ocurrio un error');
  //   });
  // }

  
  multiplicar():void{
    this.pedido.costo=this.precio*this.pedido.cantidad;
  }  

  agregar({value,valid}:{value:Pedido , valid:boolean}){
    if(!valid){
      this.flashMessages.show('Por favor llene el fomulario correctamente',{
        cssClass:'alert-danger', timeout : 4000
      });
      this.clienteForm.resetForm();

    }
    else {
      this.MenuService.save(value).subscribe((data)=>{
        alert('Pedido registrado');
        this.clienteForm.resetForm();
        this.cerrarModal();       
      },(error)=>{
        alert('Error al guardar');
      });
      
    }
  }
  private cerrarModal(){
    this.botonCerrar.nativeElement.click();
  }

}
