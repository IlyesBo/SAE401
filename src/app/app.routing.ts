import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BandeaupromoComponent } from './components/bandeaupromo/bandeaupromo.component';
import { CarteComponent } from './components/carte/carte.component';
import { EntrepriseComponent } from './components/entreprise/entreprise.component';
import { FooterComponent } from './components/footer/footer.component';
import { HeaderComponent } from './components/header/header.component';
import { IntroComponent } from './components/intro/intro.component';

const routes: Routes = [
  { path: '', redirectTo: '/intro', pathMatch: 'full' }, // Redirection par défaut vers intro
  { path: 'bandeau-promo', component: BandeaupromoComponent },
  { path: 'carte', component: CarteComponent },
  { path: 'entreprise', component: EntrepriseComponent },
  { path: 'footer', component: FooterComponent },
  { path: 'header', component: HeaderComponent },
  { path: 'intro', component: IntroComponent },
  { path: '**', redirectTo: '/intro' } // Redirection pour les routes non définies
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
