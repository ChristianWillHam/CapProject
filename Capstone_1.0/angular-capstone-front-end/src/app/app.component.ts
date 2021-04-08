import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  public title = 'My Global Page';
  public isAuthenticated: boolean;

  constructor() {
    this.isAuthenticated = false;
  }

  login() {
  }

  logout() {
  }
}
