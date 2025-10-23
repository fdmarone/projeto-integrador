const { DataTypes, Model } = require('sequelize');
const sequelize = require('../config/database');

class Feedback extends Model {}

Feedback.init({
  id: {
    type: DataTypes.UUID,
    primaryKey: true,
    defaultValue: DataTypes.UUIDV4
  },
  userId: { type: DataTypes.UUID, allowNull: true },
  gameId: { type: DataTypes.UUID, allowNull: false },
  helpful: { type: DataTypes.BOOLEAN, defaultValue: false },
  notes: { type: DataTypes.TEXT }
}, {
  sequelize,
  modelName: 'feedback',
  tableName: 'feedbacks',
  timestamps: true
});

module.exports = Feedback;