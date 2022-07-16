import { Pedido } from './../interface/pedido';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class PedidosService {
  RUTA_API="http://127.0.0.1:8000/api";
  constructor(private httpClient:HttpClient) { 
    
  }
  save(value){
    return this.httpClient.get(this.RUTA_API+'/menu',value);

  }
}
