const { Game, Recommendation, User } = require('../models');

/**
 * scoreGame: regra simples
 * - combina tags do jogo com disabilities do usuário
 * - matching de accessibilityNeeds com features
 * - aumento por avaliação (rating)
 */

function scoreGame(game, profile) {
  let score = 0;
  const tags = game.tags || [];
  const features = game.features || {};
  const disabilities = profile.disabilities || [];

  disabilities.forEach(d => {
    const type = d.type;
    const severity = d.severity || 'medium';
    if (tags.includes(type)) {
      score += severity === 'high' ? 6 : 3;
    }
  });

  const needs = profile.accessibilityNeeds || [];
  needs.forEach(n => {
    if (features && features[n]) score += 4;
  });

  if (game.rating) score += Math.min(game.rating, 5) / 1.5;

  // small random tie-breaker
  score += Math.random() * 0.01;
  return score;
}

async function recommend(req, res) {
  try {
    const { userId, profile, limit = 10 } = req.body;
    let userProfile = profile;
    if (userId && !profile) {
      const user = await User.findByPk(userId);
      if (!user) return res.status(404).json({ error: 'user_not_found' });
      userProfile = {
        disabilities: user.disabilities || [],
        preferences: user.preferences || {},
        accessibilityNeeds: user.accessibilityNeeds || []
      };
    }
    if (!userProfile) return res.status(400).json({ error: 'provide_userId_or_profile' });

    const games = await Game.findAll();
    const scored = games.map(g => {
      const plain = g.get ? g.get({ plain: true }) : g;
      return { game: plain, score: scoreGame(plain, userProfile) };
    });
    scored.sort((a, b) => b.score - a.score);
    const top = scored.slice(0, limit).map(s => s.game);

    const rec = await Recommendation.create({
      userId: userId || null,
      inputProfile: userProfile,
      recommendedGameIds: top.map(g => g.id),
      method: 'rule-based'
    });

    res.json({ recommendationId: rec.id, results: top });
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'failed_to_recommend' });
  }
}

module.exports = { recommend };