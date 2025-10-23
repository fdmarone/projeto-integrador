const { DataTypes, Model } = require('sequelize');
const sequelize = require('../config/database');

class Recommendation extends Model {}

Recommendation.init({
  id: {
    type: DataTypes.UUID,
    primaryKey: true,
    defaultValue: DataTypes.UUIDV4
  },
  userId: { type: DataTypes.UUID, allowNull: true },
  inputProfile: { type: DataTypes.JSON, defaultValue: {} },
  recommendedGameIds: { type: DataTypes.JSON, defaultValue: [] },
  method: { type: DataTypes.STRING, defaultValue: 'rule-based' }
}, {
  sequelize,
  modelName: 'recommendation',
  tableName: 'recommendations',
  timestamps: true
});

module.exports = Recommendation;