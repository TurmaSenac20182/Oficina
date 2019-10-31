import {Routes, RouterModule} from '@angular/router';
import { FormularioClienteComponent } from './formulario-cliente/formulario-cliente.component';
import { HomeComponent } from './home/home.component';
import { ModuleWithProviders } from '@angular/compiler/src/core';
import { OrdemServicoComponent } from './ordem-servico/ordem-servico.component';


const APP_Routes: Routes=[
 //caminho
    {
        path: '', component:HomeComponent
    },
    {
        path: 'formulario-cliente', component:FormularioClienteComponent
    },
    {
        path: 'ordem-servico', component:OrdemServicoComponent
    }
    ];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_Routes);