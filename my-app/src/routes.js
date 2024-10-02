import { useRoutes } from 'react-router-dom';
import HomePage from './pages/HomePage';
import LoginPage from './pages/LoginPage';
import Dashboard from './pages/Dashboard';
import AdminPage from './pages/AdminPage';
import Unauthorized from './pages/Unauthorized';
import ProtectedRoute from './hooks/ProtectedRoutes';
import MapasPage from './pages/MapasPage';

export default function Routes() {
    const routes = useRoutes([
        {
            path: "/",
            element: <HomePage />,
        },
        {
            path: "/login",
            element: <LoginPage />,
        },
        {
            path: "/unauthorized",
            element: <Unauthorized />, // Página para mostrar si el usuario no tiene permisos
        },
        {
            path: "/dashboard",
            element: (
                <ProtectedRoute allowedRoles={['user']}>
                    <Dashboard />
                </ProtectedRoute>
            ), // Permite acceso a 'admin' y 'user'
            children: [
                { path: "mapas", element: <MapasPage /> }, // Cambia a "mapas" para que sea relativo
                { path: "reportes", element: <h1>Reportes</h1> },
            ],
        },
        {
            path: "/admin",
            element: <ProtectedRoute allowedRoles={['admin']} />, // Solo permite acceso a 'admin'
            children: [
                { path: "/admin", element: <AdminPage /> },
            ],
        },
    ]);

    return routes;
}
