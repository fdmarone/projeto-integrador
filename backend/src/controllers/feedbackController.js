const { Feedback } = require('../models');

async function sendFeedback(req, res) {
  try {
    const { gameId, helpful = false, notes } = req.body;
    const userId = req.user ? req.user.id : null;
    if (!gameId) return res.status(400).json({ error: 'gameId_required' });
    const fb = await Feedback.create({ userId, gameId, helpful, notes });
    return res.status(201).json(fb);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'failed_to_create_feedback' });
  }
}

module.exports = { sendFeedback };