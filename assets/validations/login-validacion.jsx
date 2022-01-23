import * as Yup from "yup";

export default function LoginValidacion() {
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

    return validationSchema;
}

