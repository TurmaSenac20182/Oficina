import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioClienteComponent } from './Cliente/formulario-cliente/formulario-cliente.component';
import { PaginaClienteComponent } from './Cliente/pagina-cliente/pagina-cliente.component';
import { HomeComponent } from './home/home.component';
import { routing } from './app.routing';


@NgModule({
  declarations: [
    AppComponent,
    FormularioClienteComponent,
    PaginaClienteComponent,
    HomeComponent
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
