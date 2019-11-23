import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { DadoCarro } from '../Model/dadosCarro';


@Injectable({
  providedIn: 'root'
})
export class DAOService {



  PHP_API_SERVER = "http://127.0.0.1:8080";

  constructor(private http: HttpClient) { }
 
  insert(dadosCarro: DadoCarro): Observable<DadoCarro>{
     return this.http.post<DadoCarro>
     (`${this.PHP_API_SERVER}/apiBanco/metodos/create.php`, dadosCarro);

  }
  
}
