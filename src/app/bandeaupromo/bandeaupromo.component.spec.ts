import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BandeaupromoComponent } from './bandeaupromo.component';

describe('BandeaupromoComponent', () => {
  let component: BandeaupromoComponent;
  let fixture: ComponentFixture<BandeaupromoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [BandeaupromoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(BandeaupromoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
