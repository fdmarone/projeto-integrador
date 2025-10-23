require('dotenv').config();
const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const { sequelize } = require('./models');
const authRoutes = require('./routes/auth');
const gamesRoutes = require('./routes/games');
const recRoutes = require('./routes/recommendations');
const fbRoutes = require('./routes/feedback');

const app = express();
app.use(cors());
app.use(bodyParser.json());

app.use('/auth', authRoutes);
app.use('/api/games', gamesRoutes);
app.use('/api/recommendations', recRoutes);
app.use('/api/feedback', fbRoutes);

app.get('/health', (req, res) => res.json({ ok: true }));

const PORT = process.env.PORT || 4000;

async function start() {
  try {
    await sequelize.authenticate();
    // Para desenvolvimento: sincroniza modelos. Em produção temos que usar migrations.
    await sequelize.sync({ alter: true });
    app.listen(PORT, () => console.log(`Server listening on port ${PORT}`));
  } catch (err) {
    console.error('Failed to start', err);
    process.exit(1);
  }
}

start();