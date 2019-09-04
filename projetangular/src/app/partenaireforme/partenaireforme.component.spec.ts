import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PartenaireformeComponent } from './partenaireforme.component';

describe('PartenaireformeComponent', () => {
  let component: PartenaireformeComponent;
  let fixture: ComponentFixture<PartenaireformeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PartenaireformeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PartenaireformeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
