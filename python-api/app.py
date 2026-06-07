from flask import Flask, request, jsonify
from deepface import DeepFace
import os
import numpy as np
import json

app = Flask(__name__)

UPLOAD_FOLDER = "uploads"
os.makedirs(UPLOAD_FOLDER, exist_ok=True)


@app.route('/test')
def test():
    return jsonify({
        "status": "success",
        "message": "Python API Connected"
    })


@app.route('/upload', methods=['POST'])
def upload():
    if 'foto' not in request.files:
        return jsonify({"status": "error", "message": "Foto tidak ditemukan"})

    foto = request.files['foto']
    path = os.path.join(UPLOAD_FOLDER, foto.filename)
    foto.save(path)

    return jsonify({
        "status": "success",
        "filename": foto.filename
    })


@app.route('/generate-encoding', methods=['POST'])
def generate_encoding():
    if 'foto' not in request.files:
        return jsonify({"status": "error", "message": "Foto tidak ditemukan"})

    foto = request.files['foto']
    path = os.path.join(UPLOAD_FOLDER, foto.filename)
    foto.save(path)

    try:
        embedding = DeepFace.represent(
            img_path=path,
            model_name="Facenet",
            enforce_detection=False
        )

        encoding = embedding[0]['embedding']

        return jsonify({
            "status": "success",
            "encoding": encoding
        })

    except Exception as e:
        return jsonify({
            "status": "error",
            "message": "gagal generate encoding",
            "debug": str(e)
        })


@app.route('/verify-face', methods=['POST'])
def verify_face():

    if 'foto' not in request.files:
        return jsonify({"status": "error", "message": "foto tidak ditemukan"})

    encoding_db = request.form.get('encoding')
    if not encoding_db:
        return jsonify({"status": "error", "message": "encoding kosong"})

    # parse encoding
    try:
        encoding_db = json.loads(encoding_db)
    except Exception as e:
        return jsonify({
            "status": "error",
            "message": "encoding invalid",
            "debug": str(e)
        })

    encoding_db = np.array(encoding_db, dtype=np.float64)

    foto = request.files['foto']
    path = os.path.join(UPLOAD_FOLDER, foto.filename)
    foto.save(path)

    try:
        embedding = DeepFace.represent(
            img_path=path,
            model_name="Facenet",
            enforce_detection=False
        )

        encoding_baru = np.array(embedding[0]['embedding'], dtype=np.float64)

    except Exception as e:
        return jsonify({
            "status": "error",
            "message": "face extraction failed",
            "debug": str(e)
        })

    distance = np.linalg.norm(encoding_db - encoding_baru)

    verified = distance < 5

    return jsonify({
        "status": "success",
        "verified": bool(verified),
        "distance": float(distance),
        "db_sample": float(encoding_db[0]),
        "baru_sample": float(encoding_baru[0])
    })


if __name__ == '__main__':
    app.run(debug=True)
