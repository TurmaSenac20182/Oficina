import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioClienteComponent } from './formulario-cliente/formulario-cliente.component';
import { HomeComponent } from './home/home.component';
import { routing } from './app.routing';
import { OrdemServicoComponent } from './ordem-servico/ordem-servico.component';


@NgModule({
  declarations: [
    AppComponent,
    FormularioClienteComponent,
    HomeComponent,
    FormsModule,
    HttpClient,
    OrdemServicoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
