import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { DadoCarro } from '../Model/dadosCarro';


@Injectable({
  providedIn: 'root'
})
export class DAOService {

  base_path = 'https://localhost/oficina/dadoCarro';

  constructor(private http: HttpClient) { }

  // Http Options
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  // Handle API errors
  private handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // Ocorreu um erro no cliente ou na rede.
      console.error('Ocorreu um erro:', error.error.message);
    } else {
      // O back-end retornou um código de resposta sem êxito.
      // O corpo da resposta pode conter pistas sobre o que deu errado.
      console.error(
        `Backend returned code ${error.status}, ` +
        `body was: ${error.error}`);
    }
    // return an observable with a user-facing error message
    return throwError(
      'Something bad happened; please try again later.');
  };

  /** C.R.U.D **/

  /**
   * adddadosCarro(dadosCarro) - Método responsável por inserir dadosCarros no banco
   */
  public adddadosCarro(dadosCarro: DadoCarro): Observable<DadoCarro> {
    return this.http
      .post<DadoCarro>(this.base_path, JSON.stringify(dadosCarro), this.httpOptions)
      .pipe(
        retry(2),
        catchError(this.handleError)
      )
  }

  /**
   * selectdadosCarroById(id) - Método responsável por buscar um dadosCarro pelo id
   */
  public selectdadosCarroById(id: number): Observable<DadoCarro> {
    return this.http
      .get<DadoCarro>(this.base_path + '?id=' + id)
      .pipe(
        retry(2),
        catchError(this.handleError)
      )
  }

  /**
   * selectdadosCarroById(id) - Método responsável por buscar um dadosCarro pelo id
   */
  public selectdadosCarros(): Observable<DadoCarro> {
    return this.http
      .get<DadoCarro>(this.base_path)
      .pipe(
        retry(2),
        catchError(this.handleError)
      )
  }

  /**
   * updatedadosCarro(dadosCarro) - Método responsável por atualizar um dadosCarro
   */
  public updatedadosCarro(dadosCarro: DadoCarro): Observable<DadoCarro> {
    return this.http
      .put<DadoCarro>(this.base_path + '?id=' + dadosCarro.idCarro, JSON.stringify(dadosCarro), this.httpOptions)
      .pipe(
        retry(2),
        catchError(this.handleError)
      )
  }

  /**
   * deletedadosCarro(id) - Método responsável por excluir um dadosCarro
   */
  public deletedadosCarro(id: number) {
    return this.http
      .delete<DadoCarro>(this.base_path + '?id=' + id, this.httpOptions)
      .pipe(
        retry(2),
        catchError(this.handleError)
      )
  }

}