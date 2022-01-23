import * as yup from "yup";

const InstitucionValidacion = {
    email: yup
        .string()
        .email("Enter a valid email")
        .required("Email is required"),
    password: yup
        .string()
        .min(8, "Password must contain at least 8 characters")
        .required("Enter your password"),
};

export default InstitucionValidacion;
