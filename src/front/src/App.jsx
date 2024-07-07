import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./views/Home/Home";

import Login from "./views/Login/Login";

import Register from "./views/Register/Register";

function App() {
return (
  <BrowserRouter>
    <Routes>

      <Route path="/" element={<Login />} />
      

      <Route path="/" element={<Home />} />
      <Route path="/register" element={<Register />} />

    </Routes>
  </BrowserRouter>  
)
}

export default App;
