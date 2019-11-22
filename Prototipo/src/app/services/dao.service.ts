import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { TesteBanco } from '../Model/TesteBanco';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class DAOService {

  PHP_API_SERVER = "http://127.0.0.1:8080";

  constructor(private httpClient: HttpClient) { }
  
  createCliente(TesteBanco: TesteBanco): Observable<TesteBanco> {
    return this.httpClient.post<TesteBanco>(`${this.PHP_API_SERVER}/api/create.php`, TesteBanco);
  }
  
}
