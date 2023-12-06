import React, { useState } from "react";
import { sendRequest } from "../../../core/helpers/request";

const RegisterForm = ({ switchToLogin }) => {
  const [form, setForm] = useState({
    email: "",
    password: "",
    name: "",
    lastName: "",
  });

  const handleForm = (field, value) => {
    setForm((prev) => {
      return {
        ...prev,
        [field]: value,
      };
    });
  };

  const handleSubmit = async () => {
    const body = { ...form, last_name: form.lastName };
    const response = await sendRequest({
      body: body,
      route: "/signup",
      method: "POST",
    });

    console.log(response.status);
  };
  return (
    <div className="flex column authBox">
      <input
        type="text"
        name="email"
        onChange={(e) => handleForm("email", e.target.value)}
      />
      <input
        type="text"
        name="password"
        onChange={(e) => handleForm("password", e.target.value)}
      />
      <input
        type="text"
        name="name"
        onChange={(e) => handleForm("name", e.target.value)}
      />
      <input
        type="text"
        name="lastName"
        onChange={(e) => handleForm("lastName", e.target.value)}
      />

      <button className="primary-bg white-text" onClick={() => handleSubmit()}>
        Register
      </button>

      <p>
        Already have an account?{" "}
        <span className="primary-text" onClick={() => switchToLogin()}>
          Login!
        </span>
      </p>
    </div>
  );
};

export default RegisterForm;
