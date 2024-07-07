import React, { Component } from "react";
import "./Login.css";

export default class Login extends Component {
  render() {
    return (
      <>
        <div className="colorFondo">
            <div className="imagen d-flex justify-content-center">
            <img src="/images/Vault-Pass.png" alt=""></img>
            </div>
          <div className="d-flex justify-content-center">
            <form action="">
              <label id="label1">Correo</label>
              <br />
              <input type="email" name="correo" className="input-large rounded-3" />
              <br />
              <label id="label1">Contraseña</label>
              <br />
              <input type="password" name="pwsd" className="input-large rounded-3" />
              <br />
              <div className="class d-flex justify-content-center pt-3">
                <input type="submit" className="btn btn-main" value="Enviar" />
              </div>
            </form>
          </div>
        </div>
      </>
    );
  }
}
