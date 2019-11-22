import { Injectable } from '@angular/core';
import { HttpHeaders, HttpClient } from '@angular/common/http';
import { Cliente } from '../Model/cliente';

const httpOptions = {
  headers: new HttpHeaders(
    {'Content-Type' : 'application/json;charset=utf-8'}
  )
};

const API_URL = 'http://localhost:3000';

@Injectable({
  providedIn: 'root'
})
export class CrudService {

  constructor(private http: HttpClient) { }

  
  addCliente(cliente: Cliente) {
    return this.http.post<Cliente>(`${API_URL}/usuarios`, cliente, httpOptions);
  }
  
  getCliente(id: string) {
    return this.http.get<Cliente>(`${API_URL}/usuarios/${id}`, httpOptions);
  }
}
