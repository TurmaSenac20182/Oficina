import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { HttpModule } from '@angular/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioClienteComponent } from '../app/View/formulario-cliente/formulario-cliente.component';
import { HomeComponent } from '../app/View/home/home.component';
import { routing } from './app.routing';
import { OrdemServicoComponent } from '../app/View/ordem-servico/ordem-servico.component';

@NgModule({
  declarations: [
    AppComponent,
    FormularioClienteComponent,
    HomeComponent,
    OrdemServicoComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule,
    routing,
    HttpModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
