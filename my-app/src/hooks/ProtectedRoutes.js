import React from 'react';
import { Navigate, Outlet } from 'react-router-dom';

const ProtectedRoute = ({ allowedRoles }) => {
    // Obtén al usuario directamente desde localStorage
    const user = JSON.parse(localStorage.getItem('user'));

    // Si no hay usuario o no está autenticado, redirige al login
    if (!user) {
        return <Navigate to="/login" />;
    }

    // Verifica si el rol del usuario está en los roles permitidos
    if (allowedRoles && !allowedRoles.includes(user.role)) {
        return <Navigate to="/unauthorized" />; // Redirige si no tiene permiso
    }

    return <Outlet />; // Si todo está bien, renderiza el contenido protegido
};

export default ProtectedRoute;
