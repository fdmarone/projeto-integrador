const sequelize = require('../config/database');
const User = require('./User');
const Game = require('./Game');
const Recommendation = require('./Recommendation');
const Feedback = require('./Feedback');

// Definir associações depois que alinhar (exemplo)
User.hasMany(Recommendation, { foreignKey: 'userId' });
Recommendation.belongsTo(User, { foreignKey: 'userId' });

User.hasMany(Feedback, { foreignKey: 'userId' });
Game.hasMany(Feedback, { foreignKey: 'gameId' });
Feedback.belongsTo(User, { foreignKey: 'userId' });
Feedback.belongsTo(Game, { foreignKey: 'gameId' });

module.exports = {
  sequelize,
  User,
  Game,
  Recommendation,
  Feedback
};