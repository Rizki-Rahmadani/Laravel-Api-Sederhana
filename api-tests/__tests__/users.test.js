const axios = require('axios');

const baseURL = 'http://localhost:8000/api'; // Ganti dengan URL Laravel kamu

describe('User API', () => {
    let updatedUserId = null;

    it('should return all users', async() => {
        const res = await axios.get(`${baseURL}/users`);
        expect(res.status).toBe(200);
        expect(Array.isArray(res.data)).toBe(true);
    });

    it('should create a user', async() => {
        const user = {
            name: 'medi',
            email: `medi${Date.now()}@example.com`,
            age: 28
        };

        const res = await axios.post(`${baseURL}/users`, user);
        expect(res.status).toBe(201);
        expect(res.data.name).toBe(user.name);
        createdUserId = res.data.id;
    });

    it('should return user by id', async() => {
        const res = await axios.get(`${baseURL}/users/${createdUserId}`);
        expect(res.status).toBe(200);
        expect(res.data).toHaveProperty('id');
        expect(res.data.id).toBe(createdUserId);
    });

    it('should update a user', async() => {
        const updatedData = {
            name: 'Rizki Updated',
            email: `rizki_updated${Date.now()}@example.com`,
            age: 30
        };

        const res = await axios.put(`${baseURL}/users/${createdUserId}`, updatedData);
        expect(res.status).toBe(200);
        expect(res.data.name).toBe(updatedData.name);
        expect(res.data.email).toBe(updatedData.email);
        expect(res.data.age).toBe(updatedData.age);
    });

    it('should delete a user', async() => {
        const res = await axios.delete(`${baseURL}/users/${createdUserId}`);
        expect(res.status).toBe(200);
        expect(res.data.message).toBe('User berhasil dihapus.');
    });
});