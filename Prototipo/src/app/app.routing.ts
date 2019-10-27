import {Routes, RouterModule} from '@angular/router';
import { FormularioClienteComponent } from './Cliente/formulario-cliente/formulario-cliente.component';
import { PaginaClienteComponent } from './Cliente/pagina-cliente/pagina-cliente.component';
import { HomeComponent } from './home/home.component';
import { ModuleWithProviders } from '@angular/compiler/src/core';


const APP_Routes: Routes=[
 //caminho
    {
        path: '', component:HomeComponent
    },
    {
        path: 'formulario-cliente', component:FormularioClienteComponent
    },
    {
        path: 'pagina-cliente', component:PaginaClienteComponent
    }
    ];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_Routes);