// app.routes.ts
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BoxesComponent } from './components/boxes/boxes.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { EntrepriseComponent } from './components/entreprise/entreprise.component';


export const routes: Routes = [
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  { path: 'home', component: HeaderComponent },
  { path: 'boxes', component: BoxesComponent },
  { path: 'footer', component: FooterComponent },
  { path: 'entreprise', component: EntrepriseComponent },
  { path: "app-header", component: HeaderComponent },
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
