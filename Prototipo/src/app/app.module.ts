import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioClienteComponent } from './formulario-cliente/formulario-cliente.component';
import { HomeComponent } from './home/home.component';
import { routing } from './app.routing';
import { OrdemServicoComponent } from './ordem-servico/ordem-servico.component';
import { CepComponent } from './cep/cep.component';


@NgModule({
  declarations: [
    AppComponent,
    FormularioClienteComponent,
    HomeComponent,
    OrdemServicoComponent,
    CepComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule,
    routing,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
