function isAdmin(req, res, next) {
  if (!req.user) return res.status(401).json({ error: 'not_authenticated' });
  if (!req.user.isAdmin) return res.status(403).json({ error: 'admin_required' });
  next();
}

module.exports = isAdmin;