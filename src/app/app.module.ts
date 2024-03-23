import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';
import { BoxesComponent } from './boxes/boxes.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { EntrepriseComponent } from './entreprise/entreprise.component';

@NgModule({
  declarations: [
    AppComponent,
    BoxesComponent,
    HeaderComponent,
    FooterComponent,
    EntrepriseComponent
  ],
  imports: [
    BrowserModule
    // Ajoutez d'autres modules si nécessaire
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
