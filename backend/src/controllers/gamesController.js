const { Game } = require('../models');
const { Op } = require('sequelize');

async function listGames(req, res) {
  try {
    const { tag, platform, q } = req.query;
    const filters = [];
    if (tag) {
      filters.push({ tags: { [Op.contains]: [tag] } });
    }
    if (platform) {
      filters.push({ platforms: { [Op.contains]: [platform] } });
    }
    if (q) {
      filters.push({ title: { [Op.like]: `%${q}%` } });
    }
    const where = filters.length ? { [Op.and]: filters } : {};
    const games = await Game.findAll({ where });
    res.json(games);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'failed_to_list_games' });
  }
}

async function getGame(req, res) {
  try {
    const game = await Game.findByPk(req.params.id);
    if (!game) return res.status(404).json({ error: 'not_found' });
    res.json(game);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'failed_to_get_game' });
  }
}

async function createGame(req, res) {
  try {
    const payload = req.body;
    const created = await Game.create(payload);
    res.status(201).json(created);
  } catch (err) {
    console.error(err);
    res.status(400).json({ error: 'invalid_payload' });
  }
}

module.exports = { listGames, getGame, createGame };