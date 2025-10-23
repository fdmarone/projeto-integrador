const { validationResult } = require('express-validator');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const { User } = require('../models');
require('dotenv').config();

const JWT_SECRET = process.env.JWT_SECRET || 'changeme';
const JWT_EXPIRES_IN = process.env.JWT_EXPIRES_IN || '7d';

async function register(req, res) {
  const errors = validationResult(req);
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() });

  const { name, email, password, disabilities = [], accessibilityNeeds = [] } = req.body;
  try {
    const existing = await User.findOne({ where: { email } });
    if (existing) return res.status(400).json({ error: 'email_taken' });
    const passwordHash = await bcrypt.hash(password, 10);
    const user = await User.create({ name, email, passwordHash, disabilities, accessibilityNeeds });
    return res.status(201).json({ id: user.id, email: user.email, name: user.name });
  } catch (err) {
    console.error(err);
    return res.status(500).json({ error: 'server_error' });
  }
}

async function login(req, res) {
  const errors = validationResult(req);
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() });

  const { email, password } = req.body;
  try {
    const user = await User.findOne({ where: { email } });
    if (!user) return res.status(400).json({ error: 'invalid_credentials' });
    const match = await bcrypt.compare(password, user.passwordHash);
    if (!match) return res.status(400).json({ error: 'invalid_credentials' });
    const token = jwt.sign({ id: user.id, email: user.email }, JWT_SECRET, { expiresIn: JWT_EXPIRES_IN });
    return res.json({ token, user: { id: user.id, email: user.email, name: user.name, isAdmin: user.isAdmin } });
  } catch (err) {
    console.error(err);
    return res.status(500).json({ error: 'server_error' });
  }
}

module.exports = { register, login };