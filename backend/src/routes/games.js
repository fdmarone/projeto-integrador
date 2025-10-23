const express = require('express');
const router = express.Router();
const gamesCtrl = require('../controllers/gamesController');
const auth = require('../middleware/auth');
const isAdmin = require('../middleware/isAdmin');

router.get('/', gamesCtrl.listGames);
router.get('/:id', gamesCtrl.getGame);
router.post('/', auth, isAdmin, gamesCtrl.createGame);

module.exports = router;