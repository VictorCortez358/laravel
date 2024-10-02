import React, { useState } from 'react';

const LoginPage = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        // Setear el token en localStorage
        localStorage.setItem('user', JSON.stringify({ email, role: 'user' }));
        // Obtener el token del localStorage
        const user = JSON.parse(localStorage.getItem('user'));
        // Redirigir en base al rol del usuario
        if (user.role === 'admin') {
            window.location.href = '/repsol/admin';
        } else {
            window.location.href = '/repsol/dashboard';
        }
    };

    return (
        <div className="login-page">
            <h2>Login</h2>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Email:</label>
                    <input
                        type="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        required
                    />
                </div>
                <div>
                    <label>Password:</label>
                    <input
                        type="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    );
};

export default LoginPage;