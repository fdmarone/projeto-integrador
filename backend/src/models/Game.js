const { DataTypes, Model } = require('sequelize');
const sequelize = require('../config/database');

class Game extends Model {}

Game.init({
  id: {
    type: DataTypes.UUID,
    primaryKey: true,
    defaultValue: DataTypes.UUIDV4
  },
  title: { type: DataTypes.STRING, allowNull: false },
  description: { type: DataTypes.TEXT },
  platforms: { type: DataTypes.JSON, defaultValue: [] }, // ["PC","Xbox"]
  tags: { type: DataTypes.JSON, defaultValue: [] }, // accessibility tags e.g. ["visual","motor"]
  features: { type: DataTypes.JSON, defaultValue: {} }, // {subtitles:true, remappableKeys:true}
  imageUrl: { type: DataTypes.STRING },
  rating: { type: DataTypes.FLOAT, defaultValue: 0 }
}, {
  sequelize,
  modelName: 'game',
  tableName: 'games',
  timestamps: true
});

module.exports = Game;