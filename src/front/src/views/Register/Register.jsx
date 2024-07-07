import React, { Component } from "react";
import "./Register.css";


export default class Register extends Component {
  render() {

    const regex = {
      email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
      password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/,
      palabraDeSeguridad: /^[A-Za-z]*$/
    }
    let validation = () => {
      let validation = true;

      try {
        
      } catch (error) {
        
      }
      let email = document.getElementById("email");
      let password = document.getElementById("password");
      let passwordConfirmation = document.getElementById("passwordConfirmation");
      let palabraDeSeguridad = document.getElementById("palabraDeSeguridad");

      if (email.value === "" || password.value === "" || passwordConfirmation.value === "" || palabraDeSeguridad.value === "") {
        validation = false;
        palabraDeSeguridad.style.borderColor = "#f00";
      } 

      if (password.value !== passwordConfirmation.value) {
        validation = false;
        palabraDeSeguridad.style.borderColor = "#f00";
      }

      if (regex.email.test(email.value) === false) {
        validation = false;
        palabraDeSeguridad.style.borderColor = "#f00";
      }

      if (regex.password.test(password.value) === false) {
        validation = false;
        palabraDeSeguridad.style.borderColor = "#f00";
      }

      if (regex.palabraDeSeguridad.test(palabraDeSeguridad.value) === false) {
        validation = false; 
        palabraDeSeguridad.style.borderColor = "#f00";
      }

      if (validation) {
        
      }
    }

    return (
      <>
        <div className="fondoRegistro">
          <div className="d-flex justify-content-center flex-wrap">
            <h1 className="text-center text-uppercase fw-bold col-12 pt-5 titulo">Registro</h1>
            <img src="/images/logo.png" className="img-fluid" alt="logo" />
          </div>
          <div className="d-flex justify-content-center">
            <form action="" className="col-10 col-sm-6 col-md-4 d-flex flex-wrap justify-content-center">
              <label className="text-white text-uppercase fw-bold col-12 ps-2" htmlFor="email">
                Correo
              </label>
              <input
                type="email"
                id="email"
                className="input-registro form-check rounded-3 border-0 col-12"
                placeholder="Email@gmail.com"
              />

              <label className="text-white text-uppercase fw-bold pt-2 col-12 ps-2" htmlFor="palabraDeSeguridad" >
                Palabra de seguridad
              </label>
              <input
                type="text"
                id="palabraDeSeguridad"
                className="input-registro form-check rounded-3 border-0 col-12"
                placeholder="Arkansas"
              />

              <label className="text-white text-uppercase fw-bold pt-2 col-12 ps-2" htmlFor="password">
                Contraseña
              </label>
              <input
                type="password"
                id="password"
                className="input-registro form-check rounded-3 border-0 col-12"
                placeholder="Igr7dfsE#"
              />

              <label className="text-white text-uppercase fw-bold pt-2 col-12 ps-2"  htmlFor="passwordConfirm">
                Confirmar contraseña
              </label>
              <input
                type="password"
                id="passwordConfirm"
                className="input-registro form-check rounded-3 border-0 col-12"
                placeholder="Repite la contraseña"
              />

              <input
                onClick={validation}
                id="register"
                className="input-registro rounded-3 border-0 col-6 pt-2 pb-2 mt-4"
                value="Registrarse"
              />
            </form>
          </div>
        </div>
      </>
    );
  }
}
