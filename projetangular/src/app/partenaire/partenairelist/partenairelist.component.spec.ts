import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PartenairelistComponent } from './partenairelist.component';

describe('PartenairelistComponent', () => {
  let component: PartenairelistComponent;
  let fixture: ComponentFixture<PartenairelistComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PartenairelistComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PartenairelistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
