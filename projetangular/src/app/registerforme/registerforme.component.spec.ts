import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RegisterformeComponent } from './registerforme.component';

describe('RegisterformeComponent', () => {
  let component: RegisterformeComponent;
  let fixture: ComponentFixture<RegisterformeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RegisterformeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RegisterformeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
