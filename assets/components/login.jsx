import React from "react";
import { useFormik } from "formik";
import { Container, TextField, Button } from "@material-ui/core";
import LoginValidacion from "../validations/login-validacion";

export default function Login() {
    const formulario = useFormik({
        initialValues: {
            email: "",
            password: "",
        },
        onSubmit: (values) => { console.log(JSON.stringify(values)+"333"); },
        validationSchema: LoginValidacion,
    });

    return (
        <Container component="main" maxWidth="xs">
            <form onSubmit={formulario.handleSubmit} >
                <TextField
                    label="Correo Electronico:"
                    name="email"
                    type="email"
                    placeholder="Ingresa tu email"
                    autoComplete="email"
                    autoFocus
                    value={formulario.values.email}
                    onChange={formulario.handleChange}
                    onBlur={formulario.handleBlur}
                    error={formulario.touched.email && Boolean(formulario.errors.email)}
                    helperText={formulario.touched.email && formulario.errors.email}
                    variant="outlined"
                    size="small"
                    margin="normal"
                    fullWidth
                />
                <TextField
                    label="Contraseña:"
                    name="password"
                    type="password"
                    placeholder="Ingresa tu contraseña"
                    onChange={formulario.handleChange}
                    onBlur={formulario.handleBlur}
                    error={formulario.touched.password && Boolean(formulario.errors.password)}
                    helperText={formulario.touched.password && formulario.errors.password}
                    variant="outlined"
                    size="small"
                    margin="normal"
                    fullWidth
                />
                <Button
                    type="submit"
                    color="primary"
                    variant="contained"
                    margin="normal"
                    fullWidth
                >
                    Guardar
                </Button>
            </form>
        </Container>
    );
}
