import { Injectable } from '@angular/core';
import { Http } from '@angular/http'; //npm install @angular/http
import { Cep } from './Cep';
@Injectable({
  providedIn: 'root'
})
export class CepService {

  constructor(private _http:Http) { }

  buscarCepService(cep:string){
    return new Promise ((resolve, reject) => {
      this._http.get(`//viacep.com.br/ws/${cep}/json/`)
      .subscribe((rs:any) => {
        resolve(this.recuperarCepForm(rs.json()));
      },
      (error) => {
        reject(error.json());
      })
    })
  }

  recuperarCepForm (CepRes:any): Cep {
    let cep = new Cep();

    cep.cep = CepRes.cep;
    cep.logradouro = CepRes.logradouro;
    cep.complemento = CepRes.complemento;
    cep.bairro = CepRes.bairro;
    cep.localidade = CepRes.localidade;
    cep.uf = CepRes.uf;
    return cep;
  }
}
