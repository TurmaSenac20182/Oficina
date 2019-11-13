import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import {TesteBanco} from '../Model/TesteBanco'
import { HttpHeaders } from '@angular/common/http';

const httpOptions = {
  headers: new HttpHeaders(
    {'Content-Type' : 'application/json;charset=utf-8'}
  )
};

const API_URL = 'http://localhost:3000';
@Injectable({
  providedIn: 'root'
})

@Injectable({
  providedIn: 'root'
})
export class DAOService {

  constructor(private http: HttpClient) {}

  /* CRUD METHODS */

  // CREATE
  Insert(TesteBanco: TesteBanco) {
    return this.http.post(`${API_URL}/testeBanco`, TesteBanco, httpOptions);
  }

  // RETRIEVE SINGLE
  get(id: number) {
    return this.http.get<TesteBanco>(`${API_URL}/testeBanco/${id}`, httpOptions);
  }

  // RETRIEVE All
  getall() {
    return this.http.get<TesteBanco>(`${API_URL}/testeBanco`, httpOptions);
  }

  // UPDATE
  update(TesteBanco: TesteBanco) {
    return this.http.put(`${API_URL}/testeBanco/${TesteBanco.idCliente}`, TesteBanco, httpOptions);
  }

  // DELETE
  delete(id: number) {
    return this.http.delete(`${API_URL}/testeBanco/${id}`, httpOptions);
  }
}
