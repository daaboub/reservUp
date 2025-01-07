<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Historique des Réservations</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
            </head>
            <body>
                <div class="container my-4">
                    <h2 class="mb-4">Historique des Réservations</h2>
                    <a href="/reservations" class="btn btn-primary mt-3">Retour</a>

                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Utilisateur</th>
                                <th>Salle</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="reservations/reservation">
                                <tr>
                                    <td><xsl:value-of select="id"/></td>
                                    <td><xsl:value-of select="user"/></td>
                                    <td><xsl:value-of select="salle"/></td>
                                    <td><xsl:value-of select="date"/></td>
                                    <td><xsl:value-of select="status"/></td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
