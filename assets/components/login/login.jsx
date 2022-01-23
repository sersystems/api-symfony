import React from "react";
import { useFormik } from "formik";
import { Container, TextField, Button } from "@material-ui/core";
import * as Yup from "yup";
//import InstitucionValidacion from "./InstitucionValidacion";

const validationSchema = Yup.object({
    email: Yup.string()
        .email("Correo Electronico Invalido")
        .max(180, "Máximo 180 caracteres")
        .required("Campo Requerido"),
    password: Yup.string()
        .min(8, "Mínimo 8 caracteres")
        .max(12, "Máximo 12 caracteres")
        .required("Campo Requerido"),
});

function Institucion() {

    const formulario = useFormik({
        initialValues: {
            email: "",
            password: "",
        },
        onSubmit: (values) => { console.log(JSON.stringify(values)+"333"); },
        validationSchema: validationSchema,
    });

    return (
        <Container component="main" maxWidth="xs">
            <form onSubmit={formulario.handleSubmit} >
                <TextField
                    label="Correo Electronico:"
                    id="email"
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
                    // Style UI:
                    variant="outlined"
                    size="small"
                    margin="normal"
                    fullWidth
                />
                <TextField
                    label="Contraseña:"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Ingresa tu contraseña"
                    onChange={formulario.handleChange}
                    onBlur={formulario.handleBlur}
                    error={formulario.touched.password && Boolean(formulario.errors.password)}
                    helperText={formulario.touched.password && formulario.errors.password}
                    // Style UI:
                    variant="outlined"
                    size="small"
                    margin="normal"
                    fullWidth
                />
                <Button
                    type="submit"
                    // Style UI:
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

export default Institucion;
