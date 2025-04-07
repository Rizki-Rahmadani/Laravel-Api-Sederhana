const axios = require('axios');

const baseURL = 'http://localhost:8000/api'; // Ganti dengan URL Laravel kamu

describe('User API', () => {
    it('should return all users', async() => {
        const res = await axios.get(`${baseURL}/users`);
        expect(res.status).toBe(200);
        expect(Array.isArray(res.data)).toBe(true);
    });

    it('should create a user', async() => {
        const user = {
            name: 'Rizki',
            email: `rizki${Date.now()}@example.com`,
            age: 28
        };

        const res = await axios.post(`${baseURL}/users`, user);
        expect(res.status).toBe(201);
        expect(res.data.name).toBe(user.name);
    });
});