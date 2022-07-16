import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import{HttpClientModule}from '@angular/common/http'
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ListaMenuComponent } from './lista-menu/lista-menu.component';
import { CarritoComponent } from './carrito/carrito.component';
import { CabeceraComponent } from './componentes/cabecera/cabecera.component';
import { PiePaginaComponent } from './componentes/pie-pagina/pie-pagina.component';
import { DataTablesModule } from 'angular-datatables';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { FormsModule } from '@angular/forms';
import { FlashMessagesModule } from 'angular2-flash-messages';


@NgModule({
  declarations: [
    AppComponent,
    ListaMenuComponent, 
    CarritoComponent,
    CabeceraComponent,
    PiePaginaComponent
  ],
  imports: [
    FormsModule,
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FlashMessagesModule.forRoot(),
    DataTablesModule,
    FontAwesomeModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
