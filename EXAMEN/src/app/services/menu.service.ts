import { Pedido } from './../interface/pedido';
import { Injectable } from '@angular/core';
import{HttpClient}from '@angular/common/http';
import { Menu } from './../interface/menu';

@Injectable({
  providedIn: 'root'
})
export class MenuService {
  RUTA_API="http://127.0.0.1:8000/api";

  constructor(private httpClient:HttpClient) { }
  get(){
    return this.httpClient.get(this.RUTA_API+'/menu');
  }
  save(value:Pedido){
    return this.httpClient.post(this.RUTA_API+'/menu',value);

  }
  search(idMenu){
    return this.httpClient.get(this.RUTA_API+'/menu/buscar/'+idMenu,idMenu);
  }
}
