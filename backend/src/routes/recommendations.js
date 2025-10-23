const express = require('express');
const router = express.Router();
const recCtrl = require('../controllers/recommendationsController');

router.post('/', recCtrl.recommend);

module.exports = router;