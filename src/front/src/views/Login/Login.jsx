import React, { Component } from "react";
import "./Login.css";

export default class Login extends Component {
  render() {
    return (
      <>
        <div className="colorFondoLogin">
        <h1 className="text-center text-white text-uppercase fw-bold col-12 pt-5 titulo">
              Inicio de sesión
            </h1>
          <div className="imagen d-flex justify-content-center">
            <img src="/images/Vault-Pass.png" className="img-fluid" alt=""></img>
          </div>
          <div className="d-flex justify-content-center">
            <form action="" className="col-10 col-sm-6 col-md-4 d-flex flex-wrap justify-content-center">
              <label htmlFor="email" className="text-white text-uppercase fw-bold col-12 ps-2 pt-2">
                Correo
              </label>
              <input
                type="email"
                id="email"
                className="input-login form-check rounded-3 border-0 col-12"
                placeholder="Email@gmail.com"
              />
              <label htmlFor="password" className="text-white text-uppercase fw-bold col-12 ps-2 pt-2">
                Contraseña
              </label>
              <input
                type="password"
                nid="password"
                className="input-login form-check rounded-3 border-0 col-12"
                placeholder="**********"
              />
              <div className="class d-flex justify-content-around  col-12">
                <input type="submit" className="input-login text-center rounded-3 border-0 col-5 pt-2 pb-2 mt-4 " value="Iniciar sesion" />
                <a href="/register" className="input-login text-center rounded-3 border-0 col-5 pt-2 pb-2 mt-4 text-decoration-none">Crear cuenta</a>
              </div>
            </form>
          </div>
        </div>
      </>
    );
  }
}
