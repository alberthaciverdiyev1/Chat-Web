import express from 'express';
import http from 'http';
import {Server} from 'socket.io';
import axios from 'axios';

const app = express();
const server = http.createServer(app);

app.use(express.json());
app.use(express.urlencoded({extended: true}));

const io = new Server(server, {
    cors: {
        origin: 'http://127.0.0.1:8000',
        methods: ['GET', 'POST'],
        credentials: true,
    },
});

io.on('connection', (socket) => {
    console.log('A user connected');

    socket.on('send_message', async (data, token) => {
        console.log(token)
        try {
            const res = await axios.post('http://127.0.0.1:8000/api/send-message', data, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            });
            console.log(res)
            io.emit('receive_message', data);
        } catch (error) {
            console.error('Error saving message:', error);
        }
    });

    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Socket.IO server running at http://localhost:${PORT}`);
});
