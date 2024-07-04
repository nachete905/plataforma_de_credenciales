import React from "react";
import "./Home.css";

export default function Home() {
  return (
    <>
      <div className="fondoMain">
        <div className="d-flex justify-content-center pt-5 ">
          <img src="/images/logo.png" alt=""></img>
        </div>
        <div className="d-flex justify-content-center pt-5">
          <button id="logIn" className="btn btn-main me-5 ">
            INICIAR SESIÓN
          </button>
          <button id="register" className="btn btn-main ms-5 ">
            CREAR CUENTA
          </button>
        </div>
      </div>
    </>
  );
}
